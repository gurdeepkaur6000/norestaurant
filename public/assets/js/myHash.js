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


	$scope.showSubCategory=function()
	{
		$scope.subpostDataSelect = [];
		var catvalue = document.getElementById('categoryid').value;
		$scope.catvalue = catvalue;
		$scope.subcategoryDataSelect = [];

		$scope.tnData = {};
		$http.get($url+"get-subcategory-data/"+catvalue).then(function(response) {
			$scope.subcategoryDataSelect = response.data.subcategoryData;
		});

        
	}

	$scope.showeditSubCategory=function()
	{
		$scope.subpostDataSelect = [];
		var catvalue = document.getElementById('categoryid').value;
		$scope.catvalue = catvalue;
		$scope.subcategoryDataSelect = [];

		$scope.tnData = {};
		$http.get($url+"get-subcategory-data/"+catvalue).then(function(response) {
			$scope.subcategoryDataSelect = response.data.subcategoryData;
		});

        
	}
	

	

   	



	//startTableCategory



//end

});