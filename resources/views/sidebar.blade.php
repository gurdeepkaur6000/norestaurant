
<style>

.sidebar {
  margin: 0;
  padding: 0;
  
  background-color: #f1f1f1;
  
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
<div class="col-sm-2 sidebar">
  <a class="active" href="{{ url('dashboard') }}">Home</a>
  <a  class="active" href="{{ url('categories') }}">Categories</a>
  <a  class="active" href="{{ url('posts') }}">Posts</a>
  <!--<a  class="active" href="{{ url('view-orders') }}">View Order</a>-->
  
</div>
    