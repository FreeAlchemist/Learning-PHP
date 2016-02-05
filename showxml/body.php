<?php
$xmlStr = get_fields(ifEcho('anketa.credit.busprocess'),
                     ifEcho('anketa.credit.waygive'));
$xmlStr = test.xml                     
$xmlReplased = str_replace('ISO-8859-5', 'CP1251', $xmlStr);
$xml = new SimpleXMLElement($xmlReplased);
?>
 <!--o.ryabchenko START-->
            
            <?

            function showField($obj){

                // echo"<hr>";
                // echo"obj:<br>";
                // print_r($obj);
                // echo"<hr>";

                 // echo"<hr>";
                // echo"obj:<br>";
                // print_r($obj);
                // echo"<hr>";

                
                echo'<div class="dieXML-tooltip-parent" onclick="showXML(this)">';

                // $result = $obj->xpath('FIELD');
                // // print_r($result);
                // list($field) = $result;
                // echo $field;

                // $result = $obj->xpath('FIELD/NAME | FIELD/REGEXP | FIELD/DISPLAY');
                // // print_r($result);
                // list($name,$reg,$disp) = $result;

                // echo $name." ";
                // echo '<small class="small-black" onclick="showXML(this)">';
                // echo '<span data-toggle="tooltip" data-original-title="'.$reg.'">R</span></small>';
                // echo " ";
                // if($disp == "normal"){
                //     echo '<small class="small-normal">'.$disp.'</small>';
                // }
                // elseif($disp == "none"){
                //     echo '<small class="small-none">'.$disp.'</small>';
                // }
                // elseif($disp == "disabled"){
                //     echo '<small class="small-disabled">'.$disp.'</small>';
                // }
                // else{
                //     echo '<small class="small-unexpected">'.$disp.'</small>';
                // }

                // $result = $obj->xpath('//*');

                // while(list( , $node) = each($result)) {
                //     echo '//*: ',$node,"\n"."<br>";
                // }


                // echo "<hr>";

                $tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                foreach($obj as $key => $value){

                     if($key == "NAME"){
                        echo $value;
                        echo " ";
                    }
                    
                    if($key == "REGEXP"){
                        echo '<small class="small-black" onclick="showXML(this)">';
                        echo '<span data-toggle="tooltip" data-original-title="'.$value.'">R</span></small>';
                        echo " ";
                    }
                    
                    if($key == "DISPLAY"){

                        if($value == "normal"){
                            echo '<small class="small-normal">'.$value.'</small>';
                        }
                        elseif($value == "none"){
                            echo '<small class="small-none">'.$value.'</small>';
                        }
                        elseif($value == "disabled"){
                            echo '<small class="small-disabled">'.$value.'</small>';
                        }
                        else{
                            echo '<small class="small-unexpected">'.$value.'</small>';
                        }
                    }
                }
                echo'<div class="dieXML-tooltip-child">';
                    //paint tags please
                    // echo 'нам пришел $obj:'."<br>";
                    // print_r($obj);
                    // echo "<hr>";

                    // echo 'obj->asXML():'."<br>";
                    // echo $obj->asXML();
                    // echo "<hr>";


                    

         
                    // echo 'htmlspecialchars(obj->asXML()):'."<br>";
                    // echo htmlspecialchars($obj->asXML());
                    // echo "<hr>";
                
                    echo '<pre>'.$tab.htmlspecialchars($obj->asXML()).'</pre>';
                    echo "<hr>";
               
                echo'</div>';
                echo'</div>';
            }

            
            if (@$_SESSION['trigers']['dieXML'] == 1) {
                echo '<div id="showXML_div">';

                // echo"<hr>";
                // echo"xml:<br>";
                // print_r($xml);
                // echo"<hr>";

                echo '<div id="showXML_text" onclick="showXML(this)">Show XML
                        <div class="dieXML-tooltip-child"><pre>'
                        .htmlspecialchars(iconv('CP1251','UTF-8',$xmlReplased)).
                        '</pre></div></div><hr>';
                

                foreach($xml as $key => $value){
                    echo $value->H." ".$value->TYPE."<br><br>";

                    // echo"<hr>";
                    // echo"value_FIELDS:<br>";
                    // print_r($value->FIELDS);
                    // echo"<hr>";

                    // echo"<hr>";
                    // echo"value_FIELDS_FIELD:<br>";
                    // print_r($value->FIELDS->FIELD);
                    // echo"<hr>";

                    foreach($value->FIELDS->FIELD as $key => $value){
                    // foreach($value->FIELDS as $key => $value){

                        // echo"<hr>";
                        // echo"key:<br>";
                        // print_r($key);
                        // echo"<br>value:<br>";
                        // print_r($value);
                        // echo"<hr>";

                        showField($value);
                    }
                    echo"<hr>";
                }
                echo '</div>';
            }

            ?>

            <script type="text/javascript">
            function showXML(b){

                if($(".dieXML-tooltip-child",b).css('display') == 'none'){
                    $(".dieXML-tooltip-child",b).css('display','block')
                     }
                else{
                    $(".dieXML-tooltip-child",b).css('display','none')
                }
            }

            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })

            </script>
           
            <!--o.ryabchenko FINISH-->
