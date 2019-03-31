<div class="content-wrapper">
  
  <?=$breadcump;?>

  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div id="table" class="box-body table-responsive no-padding">
            </div>
            <!-- /.box-body -->
            <div id="pagination_link" class="box-footer clearfix"></div>
          </div>
          <!-- /.box -->
        </div>
      </div>
  </section>
</div>

<?=$active_menu;?>

<script>
$(document).ready(function()
{ 
  function load_table(page)
  {
    $.ajax({
      url : "<?=base_url();?>admin_home/ManajemenUser/table/" + page,
      method : "GET",
      dataType : "json",
      success : function(data){
        $("#table").html(data.contoh_table);
        $("#pagination_link").html(data.pagination_link);
      }
    })
  }

  load_table(1);

  // $(document).on('click', '.pagination li.page-item a.page-link', function(event){
  //  event.preventDefault();
  //  var page = $(this).data('ci-pagination-page');
  //  load_table(page);
  // });

  $(document).on('click', 'a', function(event){
    event.preventDefault();
    var page = $(this).data('ci-pagination-page');
    load_table(page);
  });
});
</script>