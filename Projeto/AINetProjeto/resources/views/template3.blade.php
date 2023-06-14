<!DOCTYPE html>
<html>
<head>
    
    <title>{{$pageTitle}}</title>
    <link rel="stylesheet" href="{{asset('css/template.css')}}">
<style><?php if (isset($_SESSION['sidebar_hovered']) && $_SESSION['sidebar_hovered']) { ?>
    #sidebar-button::after {
        content: "Collapse";
    }
    <?php } else { ?>
    #sidebar-button::after {
        content: "Expand";
    }
    <?php } ?>
    </style>
    
</head>
<body>
<div id="left" class="column">
        <div class="top-left">
            <img alt="icon" src="{{asset('img/TShirt.png')}}" alt="Icon"></div>
        <div class="bottom">
        <div id="sidebar">
        <div id="sidebar-buttons">
            <a href="#" class="button">MyOrders</a>
            <a href="#" class="button">Register TShirt</a>
            <a href="#" class="button">Past Orders</a>
            <a href="/users" class="button">Users</a>
            <a href="/categories" class="button">Category</a>
            <a href="/orders" class="button">Orders</a>
            <a href="/customers" class="button">Customers</a>
        </div>
        </div>
    </div>
</div>
    <div id="right" class="column">
        <div class="top-right"><h1>{{$pageTitle}}<a href="#" class="button">Logout</a></h1><</div>
        <div class="bottom">@yield('content')</div>
    </div>
    
    </div>
    </container>
    </line2>
    <script>
        var sidebarButton = document.getElementById("sidebar-button");
        var sidebarForm = document.getElementById("sidebar-form");

        sidebarButton.addEventListener("mouseover", function() {
            sidebarForm.sidebar_hovered.value = "true";
            sidebarForm.submit();
        });

        sidebarButton.addEventListener("mouseout", function() {
            sidebarForm.sidebar_hovered.value = "false";
            sidebarForm.submit();
        });
    </script>
</body>
</html>