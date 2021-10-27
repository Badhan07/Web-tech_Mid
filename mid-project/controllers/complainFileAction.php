 <?php
   

	if ($_SERVER["REQUEST_METHOD"] == "POST"and count($_REQUEST)>0) {

           $customerOrderId=$_POST['customerOrderId'];
           $orderDate=$_POST['orderDate'];
           $complainFile=$_POST['complainFile'];

			$handle = fopen("complainFile.json", "w");
			$arr = array('customerOrderId' => $customerOrderId,'orderDate' => $orderDate,'complainFile' =>$complainFile);
			$encode = json_encode($arr);

			$res = fwrite($handle, $encode . "\n");
    }
    ?>