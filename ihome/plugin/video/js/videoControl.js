function getArgs(){
    var args = {};
	var match = null;
	var search = decodeURIComponent(location.search.substring(1));
	var reg = /(?:([^&]+)=([^&]+))/g;
	while((match = reg.exec(search))!==null){
       args[match[1]] = match[2];
    }
    return args;
}
function videoControl($scope,$q,$http,$sce){
	var deferred = $q.defer();
	$http({method:'GET',url: '/plugin.php?pluginid=video&ac=getlist&page='+getArgs().page}).
	success(function(data,status,headers,config){
		deferred.resolve(data);
	}).
	error(function(data, status, headers, config) {
		deferred.reject(data);
	});  
	var promise = deferred.promise;
	promise.then(function(data){
		$scope.multi = $sce.trustAsHtml(data.multi); 
		$scope.videos = data;
	});
	
}
function videoViewControl($scope,$q,$http,$location,$sce) {
	var deferred = $q.defer();
	$http({method:'GET',url: '/plugin.php?pluginid=video&ac=view_detail&vid='+getArgs().vid}).
	success(function(data,status,headers,config){
		deferred.resolve(data);
	}).
	error(function(data, status, headers, config) {
		deferred.reject(data);
	});  
	var promise = deferred.promise;
	promise.then(function(data){
		$scope.video = data;
	});
}
function videoUploadController($scope,$q,$http,$location) {
	var deferred = $q.defer();
	$scope.upload = function(){
		jQuery("#upload").click();
	};
	$scope.upload_model = "";
	$scope.upload_video = function() {
		$scope.file = document.getElementById("upload").files[0].name;
	};
	$scope.upload_image_change = function() {
		jQuery("#page").click();
	};
	$scope.change_viewer = function()	{
		jQuery("#page").click();	
	};
	$scope.upload_image = "http://placehold.it/202x137&amp;text=!";
	$scope.upload_page = function() {
		var fReader = new FileReader();
		file_element = document.getElementById("page");
		fReader.readAsDataURL(file_element.files[0]);
		fReader.onloadend = function(event){
			$scope.upload_image = event.target.result;
			jQuery("#image-id").attr("src",$scope.upload_image);
		}
	};
	$scope.$watch('file',function(){
		return $scope.file;
	});
	$scope.$watch('upload_image',function(){
		return $scope.upload_image;
	});
}
