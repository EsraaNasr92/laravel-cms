<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ideaspace - @yield('title')</title>

    <!-- Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
     <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable.js"></script>

    
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
    -->
</head>
<body>
    <div id="app">
       <!--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Ideaspace') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav me-auto">
                        @include('partials.nav') 
                    </ul>

                    
                    <ul class="navbar-nav ms-auto">
                      
                    </ul>
                </div>
            </div>
        </nav>-->

        <div class="header_section">
            <!-- Logo + menu section -->
            <div class="header_section-top">
                <div class="header_section-top logo">
                    <img src="{{ asset('images/ideaspace_logo.png') }}" alt="Ideaspace logo">
                </div>
                <div class="header_section-top menu">
                    <div class="top_btn"></div>
                    <a href="#" class="top_btn-link">Contact us</a>
                    
                    <div class="menu">
                        <img src="{{ asset('images/menu_1.png') }}" alt="menu line 1">
                        <img src="{{ asset('images/menu_2.png') }}" alt="menu line 2">
                        <img src="{{ asset('images/menu_3.png') }}" alt="menu line 3">
                    </div>
                </div>
            </div>
            <!-- End logo + menu section -->
            <div class="banner">
                <div class="banner_left-section">
                    <h1>We always offer</h1>
                    <h1 class="banner_left-section_title">Opportunities</h1>
                    <h1 class="banner_left-section_shadow">Opportunities</h1>
                    <h1 class="banner_left-section_title">to Learn you & Engage</h1>
                    <h1 class="banner_left-section_shadow_second">Learn</h1>
                    <h1 class="banner_left-section_shadow_third">Engage</h1>
                </div>
                <div class="banner_right-section">
                    <img src="{{ asset ('images/ideaspace-bubbles.png') }}" alt="ideaspace-bubbles">
                </div>
            </div>

        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


<!--
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>


  
 
    <script type="text/javascript">
        $(function() {
           //$('.datepicker').datetimepicker();

            //To generate post slug post from title 
           document.getElementById('title').addEventListener('blur', function(e){
            let slug = document.getElementById('slug');

            if(slug.value){
                return;
            }

            slug.value = this.value
                .toLowerCase()
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/^-+|-+$/g, '')
                
           });


           //To generate page url from title 
           document.getElementById('title').addEventListener('blur', function(e){
               let url = document.getElementById('url');

               if(url.value){
                   return;
               }

               url.value = this.value
                  .toLowerCase()
                  .replace(/[^a-z0-9-]+/g, '-')
                  .replace(/^-+|-+$/g, '')
                  
                  replace(/'/g, "\\'");
           });
        });

        // Select all button admin/menu
        $('#select-all-categories').click(function(event) {   
	    if(this.checked) {
			$('#categories-list :checkbox').each(function() {
			this.checked = true;                        
			});
            }else{
                $('#categories-list :checkbox').each(function() {
                this.checked = false;                        
                });
            }
		});

        $('#select-all-posts').click(function(event) {   
		if(this.checked) {
			$('#posts-list :checkbox').each(function() {
				this.checked = true;                        
			  });
			}else{
			  $('#posts-list :checkbox').each(function() {
				this.checked = false;                        
			  });
			}
		});   
    </script>    -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
   --> <!-- Always remember to call the above files first before calling the bootstrap.min.js file 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    -->
    @yield('scripts')
</body>
</html>
