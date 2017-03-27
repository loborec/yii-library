<?php

    class DTable{

        //\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
        // table
        //\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
        private static function _implode($prefix, $sufix, $array){
            $s='';
            foreach ($array as $a)
                $s.=$prefix.$a.$sufix;
            return $s;
        } 

        public static function table($id, $data, $options){

            if (isset($options['class']))
                $class=$options['class'];
            else
                $class='table';

            if (isset($options['style']))
                $style=$options['style'];
            else
                $style='';

            $head=isset($data['head'])?$data['head']:array();
            $body=isset($data['body'])?$data['body']:array();
            $foot=isset($data['foot'])?$data['foot']:array();

            $html=array();
            $html[]="<div class='table-responsive'>";


            if ($id===false){
                $html[]="<table class='$class' style='$style'>";
            }
            else
            {
                $html[]="<table id='$id' class='$class' style='$style'>";
            }

            if (count($head)>0){
                $html[]="<thead>";
                $html[]="<tr>";

                $index=0;
                foreach ($head as $h){
                    $html[]="<td>$h</td>";
                    $index++;  
                }

                $html[]="</tr>";
                $html[]="</thead>";
            }    

            $html[]="<tbody>";

            $tr_index=0;
            foreach ($body as $bbq){
                $html[]= "<tr>";

                $s1='';
                $td_index=0;
                foreach ($bbq as $b1){
                    $s1.="<td>".$b1.'</td>'; 
                    $td_index++;    
                }   
                $html[]=$s1;  

                $html[]= '</tr>'; 
                $tr_index++; 
            }
            $html[]="</tbody>";  

            if (count($foot)>0){
                $html[]="<tfoot>";
                $html[]="<tr>";
                foreach ($foot as $f)
                    $html[]="<td>$f</td>";
                $html[]="</tr>";
                $html[]="</tfoot>";
            }  

            $html[]="</table>";
            $html[]="</div>";
            return implode("\n", $html);
        }


    }

