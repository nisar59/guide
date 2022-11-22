<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

	<title>{{Settings()->portal_name}}</title>
<style type="text/css">
.dropdown-toggle::after{
	content: none;
}

.devices a{
	height:200px;
	position: relative;
}

.devices a .device-text{
	visibility: hidden;
	opacity: 0;
    height: 100%;
    width: calc(100% - 22px);
    position: absolute;
    z-index: 11;
	-webkit-transition: visibility 0s, opacity 1s ease-out;
  	-moz-transition: visibility 0s, opacity 1s ease-out;
  	-o-transition: visibility 0s, opacity 1s ease-out;
  	transition: visibility 0s, opacity 1s ease-out;
}
.devices a .device-text span{
	display: flex;
    align-items: center;
    height: 100%;
    justify-content: center;
    font-size: 16px;
    color: white;
    font-weight: bold;    

}
.devices a:hover .device-text{
	visibility: visible;
	opacity: 1;
	background-color: #adb5bd;
}

.devices a .device-bg{ 
 	height: 100%;
}

</style>

</head>