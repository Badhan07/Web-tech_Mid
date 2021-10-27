
 <?php
       $handle = fopen("deliveryInfo.json", "r");
       $data = fread($handle, filesize("deliveryInfo.json"));
       $explode = explode("\n", $data);

       $arr = array();
       for ($i =0; $i < count($explode); $i++){

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

        if(($orderId) === ($arr[$k]-> orderId))
        {
          $bool=true;
          $index=$k;

 
        }

      }

             
     


      /*$orderId=$arr[$index]->orderId;
      $customerUserName=$arr[$index]->customerUserName;
      $medicineCodes=$arr[$index]->medicineCodes;
      $quantities=$arr[$index]->quantities;
      $grandTotal= $arr[$index]->grandTotal; */
      $deliveryStatus=$_POST['deliveryStatus'];

     if($bool){
      $handle = fopen("deliveryHistory.json", "a");
      $arr = array('orderId' => $orderId,'customerUserName' =>  $customerUserName,'medicineCodes' =>$medicineCodes,'quantities' =>  $quantities,'grandTotal' =>  $grandTotal,'deliveryStatus'=>$deliveryStatus,'deliveredBy'=> $_SESSION['username']);
      $encode = json_encode($arr);

      $res = fwrite($handle, $encode . "\n");



     
       

     }

  }
 ?>
