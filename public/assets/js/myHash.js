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

	$scope.categoryidOnPost=function(category_id,sub_category_id)
	{
		$scope.catid = category_id;
		$scope.subcatid = sub_category_id;
		setTimeout(function(){
			$scope.$apply(function () {
				document.getElementById("categoryid").value = $scope.catid;
				document.getElementById("sub_category_id").value = $scope.subcatid;
			});
		},2000);
		//$scope.subpostDataSelect = [];
		//var catvalue = document.getElementById('categoryid').value;
		//$scope.catvalue = catvalue;
		//$scope.subcategoryDataSelect = [];

		$scope.tnData = {};
		$http.get($url+"get-allcat-data").then(function(response) {
			$scope.categoryData = response.data.categoryData;
			$scope.subcategoryData = response.data.subcategoryData;
		});

		$http.get($url+"get-subcategory-data/"+category_id).then(function(response) {
			$scope.subcategoryDataSelect = response.data.subcategoryData;
		});

        
	}
	

	

   	



	//startTableCategory



//end

});