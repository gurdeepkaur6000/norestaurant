app.controller("myHash", function($scope,$http,$window) {

//start 
	$url = "http://localhost:8000/";
	
	$scope.showSub =function(orderid)

	{

		$http.get($url+"get-order-data-by-id/"+orderid).then(function(response) {

			

			$('#orderdetailitemsall').modal('show');



			$scope.orderDetail = response.data.orderDetail;

			$scope.tableOrderDetail = response.data.tableOrderDetail;

		

			

		});

	}

	

   	



	//startTableCategory



//end

});