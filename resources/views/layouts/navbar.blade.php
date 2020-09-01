<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <style type="text/css">
    .vertical-nav {
      min-width: 17rem;
      width: 17rem;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.4s;
    }
    
    .page-content {
      width: calc(100% - 17rem);
      margin-left: 17rem;
      transition: all 0.4s;
    }
    
    /* for toggle behavior */
    
    #sidebar.active {
      margin-left: -17rem;
    }
    
    #content.active {
      width: 100%;
      margin: 0;
    }
    
    @media (max-width: 768px) {
      #sidebar {
        margin-left: -17rem;
      }
      #sidebar.active {
        margin-left: 0;
      }
      #content {
        width: 100%;
        margin: 0;
      }
      #content.active {
        margin-left: 17rem;
        width: calc(100% - 17rem);
      }
    }
    
    body {
      background: #599fd9;
      background: -webkit-linear-gradient(to right, #599fd9, #c2e59c);
      background: linear-gradient(to right, #599fd9, #c2e59c);
      min-height: 100vh;
      overflow-x: hidden;
    }
    
    .separator {
      margin: 3rem 0;
      border-bottom: 1px dashed #fff;
    }
    
    .text-uppercase {
      letter-spacing: 0.1em;
    }
    
    .text-gray {
      color: #aaa;
    }
    </style>
    
    <script>
    $(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
      });
    });
    </script>

        <!-- Vertical navbar -->
        <div class="vertical-nav bg-white" id="sidebar">
            <div class="py-4 px-3 mb-4 bg-light">
              <div class="media d-flex align-items-center">
                <div class="media-body">
                    Welcome
                </div>
              </div>
            </div>
          
            <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>
          
            <ul class="nav flex-column bg-white mb-0">
              <li class="nav-item">
                <a href="/" class="nav-link text-dark font-italic bg-light">
                          <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                          Home
                      </a>
              </li>
            </ul>

            <hr>

            <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Customer</p>
          
            <ul class="nav flex-column bg-white mb-0">
              <li class="nav-item">
                <a href="/" class="nav-link text-dark font-italic bg-light">
                          <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                          xxxx
                      </a>
              </li>
              
              <li class="nav-item">
                <a href="/customer/invoice" class="nav-link text-dark font-italic bg-light">
                          <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                          Invoice
                      </a>
              </li>
              <li class="nav-item">
                <a href="/customer/payment" class="nav-link text-dark font-italic bg-light">
                          <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                          Payment
                      </a>
              </li>
              <li class="nav-item">
                <a href="/customer/statement" class="nav-link text-dark font-italic bg-light">
                          <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                          Statement
                      </a>
              </li>
            </ul>

            <hr>
          
            <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Ventor</p>
          
            <ul class="nav flex-column bg-white mb-0">
              <li class="nav-item">
                <a href="/purchase" class="nav-link text-dark font-italic bg-light">
                          <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                          xxx
                      </a>
              </li>
              
              <li class="nav-item">
                <a href="/vendor/purchase" class="nav-link text-dark font-italic bg-light">
                          <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                          Purchase
                      </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic bg-light">
                          <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                          Payment
                      </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic bg-light">
                          <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                          Statement
                      </a>
              </li>
            </ul>
          </div>
          <!-- End vertical navbar -->
          
          
          <!-- Page content holder -->
          <div class="page-content p-5" id="content">

          <!-- Toggle button 
          <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>-->