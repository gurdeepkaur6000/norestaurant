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

	$scope.getPostsFromCat=function()
	{
		$scope.subpostDataSelect = [];
		var catvalue = document.getElementById('item-category').value;
		$scope.catvalue = catvalue;
		$scope.subcategoryDataSelect = [];
		angular.forEach($scope.subcategoryData, function (value, key) {
            if(value.parent_id==catvalue)
            {
            	$scope.subcategoryDataSelect.push(value);
            	//console.log(value.parent_id);
            }          
        }); 
        setTimeout(function(){
		$scope.$apply(function () {
        if($scope.subcategoryDataSelect.length==0)
	    {       
	        	angular.forEach($scope.postData, function (value, key) {
					if(value.category_id==$scope.catvalue)
		            {
		            	
			            	$scope.subpostDataSelect.push(value);

		            	
		            }          
		        }); 
	    }
	     }); });

	    console.log($scope.subpostDataSelect);
        

        
	}

	$scope.getPostsFrom=function()
	{
		var postvalue = document.getElementById('item-post').value;

		$scope.subpostDataSelect = [];
		angular.forEach($scope.postData, function (value, key) {
			if(value.sub_category_id==postvalue && value.category_id==$scope.catvalue)
            {
            	$scope.subpostDataSelect.push(value);
            	//console.log(value.parent_id);
            }          
        }); 

        //console.log($scope.subpostDataSelect);
	}

	//startTableCategory

//end
});