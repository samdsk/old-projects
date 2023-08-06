$(document).ready(function() {
	
	submenuHover();
	
    function submenuHover(){
		$("ul li.submenu-hover").hover(function(){
			$(this).children("ul").css({
				"display":"block",
			})
		},function(){
			$(this).children("ul").css({
				"display":"none",
			})
		});
	}
	activeMenu();
	function activeMenu() {
		 var pgurl = window.location.href.substr(window.location.href
	.lastIndexOf("/")+1);
		 $("#main-menu a").each(function(){
			  if($(this).attr("href") == pgurl  )
			  $(this).parent('li.menu-item').addClass("active"); 
		 });
	}
});


//|| $(this).attr("href") == 'index.php'