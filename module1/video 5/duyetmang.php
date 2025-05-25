<?php  

$mang = [1,2,'hai'=>3,4,5, [1,2,'hai'=> [1,2,'hai'=>3, [1,2,'hai'=>3,4,5],5],4,5]];
// echo '<pre>' , print_r($mang) , '</pre>';

function docmang($ar){

    foreach ($ar as $value){

        if(is_array($value)){

            docmang($value);

        } else{
            echo $value .'<br>';
        }
    }
}

docmang($mang);

// foreach( $mang as $key=>$value)
// {
//     if( is_array($value)){
//         foreach( $value as $value2){
//             if( is_array($value2) ){
//                 foreach( $value2 as $value3){
//                     if( is_array($value3) ){
//                         foreach( $value3 as $value4 ){
//                             if( is_array($value4) ){
//                             } else {
//                                 echo  $value4 .'<br>';
//                             }
//                         }
//                     } else{
//                         echo  $value3 .'<br>';
//                     }
//                 }
//             } else{
//                 echo $value2.'<br>';
//             }
//         }
//     } else{
//         echo $value.'<br>';
//     }
   
    
// }
