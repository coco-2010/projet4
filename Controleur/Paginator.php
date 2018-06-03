<?php

class Paginator {

    public $itemparPage;
    public $range;
    public $currentpage;
    public $total;


    private $pageNumhtml;

    public function __construct(){
        $this->itemparPage = 12;
        $this->range = 2;
        $this->currentpage = 1;
        $this->total = 0;
        $this->pageNumhtml = '';
    }


    public function paginate($param,$param2, $link){
        
        if (isset ($param2)&& $param2 != null){
            $this->currentpage = $param2; 
        }
        else if($param2 == null && isset($param)){
            $this->currentpage = $param;
        }
        else{
            $this->currentpage = 1; 
        }

        $this->pageNumhtml = $this->getPageNumbers($param,$param2,$link);
    }

    private function getPageNumbers($param,$param2,$link){
        $html = '<ul class="pagination">';
        echo $html;

        //nav pre
        if ($this->currentpage > 1 ){
            echo '<li class="page-item">';
            if($param2 != null){
                echo '<a class="page-link" href='.$link.'/'.$param.'/'. ($this->currentpage - 1).' aria-label="Previous">';
            }
            else{
                echo '<a class="page-link" href='.$link.'/'. ($this->currentpage - 1).' aria-label="Previous">';
            }
            
            echo '      <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Précédent</span>
                    </a>
                 </li>';
        }

        //pagination
        if( $this->total >= 12){
            $int = floor($this->total / 12);
        }
        else{
            $int = ceil($this->total / 12);
        }
        if ($int > $this->range){
            $start = ($this->currentpage <= $this->range)?1:($this->currentpage - $this->range);
            $end   = ($int - $this->currentpage >= $this->range)?($this->currentpage+$this->range): $int;
        }
        else{
            $start = 1;
            $end = $int;
        }

        //nav num
        for ($i = $start; $i <=$end; $i++){
            echo '<li class="page-item">';
            if($param2 != null){
                echo '<a class="page-link" href='.$link.'/'. $param.'/'.$i.'>'.$i.'</a>';
            }
            else{
                echo '<a class="page-link" href='.$link.'/'. $i.'>'.$i.'</a>';
            }
            echo '</li>';
        }

        //nav next
        if ($this->currentpage < $int){
            echo '<li class="page-item">';
            if($param2 != null){
                echo '<a class="page-link" href='.$link.'/'.$param.'/'.($this->currentpage + 1).' aria-label="Next">';
            }
            else{
                echo '<a class="page-link" href='.$link.'/'.($this->currentpage + 1).' aria-label="Next">';
            }
            echo '      <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Suivant</span>
                    </a>
                  </li>';

        }

        $htmlfin = "</ul>";
        echo $htmlfin;
    }
}