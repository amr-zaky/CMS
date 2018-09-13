  <?php 

  include_once 'includes/header.inc.php';
  ?>


<?php 

  include_once 'includes/navbar.inc.php';
  ?>

    <div class="content-wrapper">
    <div class="container-fluid">
     
      <div class="row">
        <div class="col-12">
            <h1 class="page-header">
              Welcome to Admin
              
              /<small>
                <?php

            if(isset($_SESSION['username']))
            {
             echo $_SESSION['username']; 
            }
              
             ?>
              </small>
              <hr>
            </h1> 

          </div>
        </div> 

    <div class="row">

        <div class="col-lg-3 col-xs-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">20</div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
              <a href="Posts.php">
                  <div class="panel-footer">
                      <span class="pull-left">view deteiles</span>
                      <span class="pull-right">
                          <i class="fa fa-arrow-circle-right"></i>
                      </span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>

          
        </div>

        
    </div>    







                </div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->




    </div><!-- /#right-panel -->

    <!-- Right Panel --> 
      </div>  
</div>  
<?php

include_once 'includes/footer.inc.php';

?>