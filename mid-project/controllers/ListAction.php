 <?php
       $handle = fopen("OrderHistory.json", "r");
       $data = fread($handle, filesize("OrderHistory.json"));
       $explode = explode("\n", $data);

       $arr = array();
       for ($i =0; $i < count($explode)-1; $i++){

          $decode = json_decode($explode[$i]);
          array_push($arr, $decode);
     }

?>

<?php

    if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST)>0)
    {

      $bool=false;
      $index="";
        
      for($k= 0;$k< count($arr); $k++)
      {

        if(($_POST['OrderID'] === $arr[$k]-> OrderID))
        {
          $bool=true;
          $index=$k;

 
        }

      }

      
      $orderId=$arr[$index]->OrderID;
      $customerUserName=$arr[$index]->Username;
      $medicineCodes=$arr[$index]->MedicineCodes;
      $quantities=$arr[$index]->Quantities;
      $grandTotal=$arr[$index]->GrandTotal;  
  
      if($bool){

        $handle = fopen("deliveryInfo.json", "a");
      $arr = array('orderId' => $orderId,'customerUserName' =>  $customerUserName,'medicineCodes' =>$medicineCodes,'quantities' =>  $quantities,'grandTotal' =>  $grandTotal);
      $encode = json_encode($arr);

      $res = fwrite($handle, $encode . "\n");

      header("Location:deliverySubmit.php");

      }

      else{

        echo "Did not match";
      }

  }




 ?>


