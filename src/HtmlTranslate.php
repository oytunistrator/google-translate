<?php 
namespace TranslatorFarm;

use DOMDocument;

/**
 * Class HtmlTranslate
 * @package TranslatorFarm
 */
class HtmlTranslate extends Translator
{
    public $htmlDocument;

    protected $search = array(
        '/<i\b[^>]*>(.*?)<\/i>/i',                        // <i>
        '/<em\b[^>]*>(.*?)<\/em>/i',                      // <em>
        '/<ins\b[^>]*>(.*?)<\/ins>/i',                    // <ins>
        '/(<ul\b[^>]*>|<\/ul>)/i',                        // <ul> and </ul>
        '/(<ol\b[^>]*>|<\/ol>)/i',                        // <ol> and </ol>
        '/(<dl\b[^>]*>|<\/dl>)/i',                        // <dl> and </dl>
        '/<li\b[^>]*>(.*?)<\/li>/i',                      // <li> and </li>
        '/<dd\b[^>]*>(.*?)<\/dd>/i',                      // <dd> and </dd>
        '/<dt\b[^>]*>(.*?)<\/dt>/i',                      // <dt> and </dt>
        '/<li\b[^>]*>(.*?)<\/li>/i',                      // <li>
        '/<div\b[^>]*>(.*?)<\/div>/i',                    // <div>
        '/(<tr\b[^>]*>|<\/tr>)/i',                        // <tr> and </tr>
        '/<td\b[^>]*>(.*?)<\/td>/i',                      // <td> and </td>
        '/<span\b[^>]*>(.*?)<\/span>/i',                  // <span>...</span>
    );

    public function translateHtml($html, $autoDetect = true)
    {
        $this->htmlDocument = $html;
        foreach($this->search as $pattern){
            $this->htmlDocument = preg_replace_callback(
                $pattern,
                function ($matched) use ($autoDetect) {
                    return $this->translate($matched[1], $autoDetect);
                },
                $this->htmlDocument
            );
        }

        return $this->htmlDocument;
    }
}