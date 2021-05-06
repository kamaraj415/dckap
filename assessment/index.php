<html>
<head>
<title> PHP - Assessment </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


  <style>


    .nav-bar{
      display: flex;
      padding: 20px 40px;
      position: fixed;
      background-color: #006880;
      width: 100vw;
      top: 0;

    }

  .nav-logo{
    font-weight: 900;
    color: white;
    font-size: 30px;
    transition: .5s;
    cursor: pointer;
  }

  .nav-links{
    flex: 1;
    margin-top: 8px;
  }

  .nav-links ul{
    margin-left: 50px;
    display: inline;
  }

  .nav-links ul li{
    list-style: none;
    display: inline-block;
    padding: 2px 25px;
  }

  .nav-links ul a{
    color: white;
    text-decoration: none;
    font-size: 17px;
    float: right;
  }

  .nav-links ul li::after{
    content: '';
    width: 0%;
    height: 2px;
    display: block;
    background: yellow;
    transition: 0.5s;
  }

  .nav-links ul li:hover::after{
    width: 100%;

  }

  .nav-logo:hover{
    color: yellow;
  }

  .panel-default>.panel-heading {
    color: #fff;
    background-color: #006880;
    border-color: #006880;
}
.panel-default {
    border: unset;
    box-shadow: 0px 0px 4px 0px #0068802e;
}

  </style>

</head>
<body>

  <div style="position : fixed">
    <div class="nav-bar">
      <div class="nav-logo">
          <a style="color:#cb4f2b;cursor : pointer;text-decoration : none;">  DCKAP </a> - ASSESSMENT
      </div>
      <div class="nav-links">
        <ul>
        <a><button class="btn btn-warning" data-toggle="modal" title="Create Location" data-target="#CenterModal">Post Ads</button></a>
        </ul>
      </div>
    </div>
  </div>

  <div class="container" style="margin-top: 100px;position : inherit">
    <div class="row">
      <div class="col-lg-11 panel panel-default" style="margin-left : 6%;padding : 10px;" >
        <div class="col-lg-4">
          <select name= "sort_by" id="sort_by"  class="form-control">
            <option value="name">Product Name</option>
            <option value="price">Product Price</option>
          </select>
        </div>
          <div class="col-lg-4">
            <select name= "sort_order" id="sort_order"  class="form-control">
              <option value="asc">Ascending</option>
              <option value="desc">Descending</option>
            </select>
          </div>
          <div class="col-lg-4">
            <button class="btn btn-success" id="btn_sort">Filter</button>
          </div>
      </div>
      <div class="col-lg-12 card-box" id="ad_list" style="margin-top: 10px;">

      </div>

    </div>

  </div>

  <div id="CenterModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CenterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form class="form-horizontal" id="frm_create">
          <input type="hidden" name="function" value="3">
          <div class="modal-header col-lg-12" style="margin-bottom : 15px;">
            <h3 class="modal-title" id="CenterModalLabel"> Post Ads</h3>
          </div>
          <div class="modal-body cdr_reload">
            <h4 >Seller Info </h4><hr style="margin-top: 4px;">
              <div class="form-group">
                <div class="col-lg-6">
                  <label for="name" style="font-size: x-small;"> <span>Name <span class="mandatory_input">*</span></span> </label>
                  <input class="form-control" autocomplete="off" type="text" name="name" id="name">
                </div>
                <div class="col-lg-6">
                  <label for="phone" style="font-size: x-small;"> <span>Phone <span class="mandatory_input">*</span></span> </label>
                  <input class="form-control" autocomplete="off" type="number" name="phone" id="phone">
                </div>
                <div class="col-lg-12" style="margin-top : 10px;">
                  <label for="address" style="font-size: x-small;"> <span>Address <span class="mandatory_input">*</span></span> </label>
                  <input class="form-control" autocomplete="off" type="text" name="address" id="address">
                </div>
              </div>

              <h4 >Product Info </h4><hr style="margin-top: 4px;">
              <div class="form-group">
                <div class="col-lg-6">
                  <label for="product" style="font-size: x-small;"> <span>Product Name <span class="mandatory_input">*</span></span> </label>
                  <input class="form-control" autocomplete="off" type="text" name="product" id="product">
                </div>
                <div class="col-lg-6">
                  <label for="brand" style="font-size: x-small;"> <span>Brand <span class="mandatory_input">*</span></span> </label>
                  <input class="form-control" autocomplete="off" type="text" name="brand" id="brand">
                </div>
                <div class="col-lg-6" style="margin-top : 10px;">
                  <label for="price" style="font-size: x-small;"> <span>Price <span class="mandatory_input">*</span></span> </label>
                  <input class="form-control" autocomplete="off" type="number" name="price" id="price">
                </div>
                <div class="col-lg-6" style="margin-top : 10px;">
                <label for="type" style="font-size: x-small;"> <span>Status <span class="mandatory_input">*</span></span> </label>
                  <select class="form-control" id="type" name="type">
                    <option value=""> Select Type </option>
                    <option value="New"> New </option>
                    <option value="Used"> Used </option>
                  </select>
                </div>
              </div>
              <div class="" id="form-div" > <label> </label></div>
            </div>
          <div class="modal-footer">
            <button type="submit" data-dismiss="modal" aria-hidden="true" class="btn btn-danger waves-effect waves-light">Close</button>
            <button type="submit" id="btnsubmit" class="btn btn-success waves-effect waves-light">Post</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<script>
$(document).ready(function(){
  $.ajax(
  {

        type:'POST',
        url:'db.php',
        data:{"function" : "1"},
        success: function(data){
          var data = JSON.parse(data);
          if(data.status == 1)
          {
            alert(data.message);
          }else{
            load_ads();
          }
  }

  });
});

function load_ads(){

  $.ajax(
  {

        type:'POST',
        url:'db.php',
        data:{"function" : "2",'sort_by' : $('#sort_by').val(),'sort_order' : $('#sort_order').val()},
        success: function(data){
          var data = JSON.parse(data);
          if(data.status == 1)
          {
            $('#ad_list').html(data.html_content);
          }
  }

  });

}

$(document).on('click','#btn_sort',function(e){
  e.preventDefault();
    load_ads();
});

$(document).on('click','#btnsubmit',function(e){
  e.preventDefault();
  if($('#name').val() =='' || $('#phone').val() =='' || $('#address').val() =='' || $('#product').val() =='' || $('#price').val() =='' || $('#brand').val() =='' || $('#type').val() =='')
  {
    alert('Kindly enter all Mandatory Fields');
    return false;
  }
  $.ajax(
  {

        type:'POST',
        url:'db.php',
        data:$('#frm_create').serialize(),
        success: function(data){
          var data = JSON.parse(data);
          if(data.status == 1)
          {
            alert(data.message);
          }else{
              alert(data.message);
              // $('#CenterModal').hide();
          $("#frm_create")[0].reset();
              load_ads();
          }
  }

  });
});
</script>
</body>
</html>
