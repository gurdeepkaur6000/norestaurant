app.controller("myCtrl", function($scope,$http,$window) {
//start 
	$scope.showTableDataPage =function()
	{
		$scope.tnData = {};
		$http.get("/get-Table-Number").then(function(response) {
			$scope.tnData = response.data;
		});
	}
	
   	$scope.startTableNumber = function(data)
   	{
   		var order_id = 0;
   		$window.location.href = '/items/'+data.id+'/'+order_id;
   	}

   	$scope.getTablePostPage =function(tableid,orderid)
	{

		$scope.categoryData = {};
		var obj = {'tableid':tableid,
					'orderid':orderid
				};
		$http.post("/get-table-post-data",obj).then(function(response) {
			$scope.categoryData = response.data.categoryData;
			$scope.subcategoryData = response.data.subcategoryData;
			$scope.onetnData = response.data.onetnData;
			$scope.postData = response.data.postData;
			$scope.tableid=tableid;
			$scope.orderid=orderid;
		});
	}

	//startTableCategory

//end
});