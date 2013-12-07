</div>
<footer class="span12"> &copy; php exam auction</footer>
</div>
</div>
<?php 
if(is_logged_in()){
	echo '<script>$("#reg").hide();$("#out").show();</script>';
	}else
	{
		echo '<script>$("#out").hide();$("#reg").show();</script>';
	}
	 ?>
</body>
</html>