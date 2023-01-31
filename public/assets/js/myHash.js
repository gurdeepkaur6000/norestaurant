app.controller("myHash", function($scope,$http,$window) {
//start 
	$scope.showSub =function(orderid)
	{
		$http.get("/get-order-data-by-id/"+orderid).then(function(response) {
			
			$('#orderdetailitemsall').modal('show');

			$scope.orderDetail = response.data.orderDetail;
			$scope.tableOrderDetail = response.data.tableOrderDetail;
		
			console.log($scope.tableOrderDetail);
		});
	}
	
   	

	//startTableCategory

//end
});