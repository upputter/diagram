<?php
if(!defined('DOKU_INC')) die();

class syntax_plugin_diagram extends DokuWiki_Syntax_Plugin {
	public function getType(){ return 'formatting'; }
    public function getAllowedTypes() { return array('formatting', 'substition', 'disabled'); }   
    public function getSort(){ return 158; }
    public function connectTo($mode) { $this->Lexer->addEntryPattern('<diagram.*?>(?=.*?</diagram>)',$mode,'plugin_diagram'); }
    public function postConnect() { $this->Lexer->addExitPattern('</diagram>','plugin_diagram'); }
 
	public function handle($match, $state, $pos, Doku_Handler $handler) {
     
       return array($state, $match);
    }
	
	    public function render($mode, Doku_Renderer $renderer, $data) {
        // $data is what the function handle() return'ed.
        if($mode == 'xhtml'){
            /** @var Doku_Renderer_xhtml $renderer */
            list($state,$match) = $data;
            switch ($state) {             
 
                case DOKU_LEXER_UNMATCHED :  
					$filename = str_replace(':' , '/', $match);
					$fullFilename = 'data/media' . $filename;
					$xml = simplexml_load_string(file_get_contents($fullFilename));
				
				
                    $renderer->doc .= '<div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;xml&quot;:&quot;&lt;mxfile userAgent=\&quot;Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36\&quot; version=\&quot;6.0.2.8\&quot; editor=\&quot;www.draw.io\&quot; type=\&quot;device\&quot;&gt;&lt;diagram name=\&quot;Page-1\&quot;&gt;' . $xml->diagram . '&lt;/diagram&gt;&lt;/mxfile&gt;&quot;,&quot;toolbar&quot;:&quot;pages zoom layers lightbox&quot;,&quot;page&quot;:0}"></div>
					<a href="/lib/plugins/diagram/lib/?lang=de&offline=1&url=' . $filename . '" target="_blank" style="display: block; width:100%; text-align: right">Online-Editor öffnen</a>
					<script type="text/javascript" src="/lib/plugins/diagram/lib/icon_lib.js"></script>' ; 
                    break;
                
            }
            return true;
        }
        return false;
    }
 
}