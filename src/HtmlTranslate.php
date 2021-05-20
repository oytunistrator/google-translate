<?php 
namespace TranslatorFarm;

use DOMDocument;

/**
 * Class HtmlTranslate
 * @package TranslatorFarm
 */
class HtmlTranslate
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

    public function __construct($html)
    {
        $this->htmlDocument = $html;
    }

    public function pregMatch()
    {
        foreach($this->search as $pattern){
            preg_replace_callback(
                $pattern,
                function ($sonuc) {
                    var_dump($sonuc);
                },
                $this->htmlDocument
            );
        }
    }


}