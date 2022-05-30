<?php
/*
////////////// Teameyo Project Management System  //////////////////////
//////////////////// Admin Footer //////////////////////////
*/
?>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->
<!-- font awesome -->
<script src="https://kit.fontawesome.com/42be07190b.js" crossorigin="anonymous"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo $base_url; ?>assets/js/datatables.min.js" type="text/javascript"></script>
<!-- font awesome ICON -->
<script type="text/javascript">
	$.base_url = "<?php echo $base_url; ?>";
</script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url; ?>assets/js/function.js" type="text/javascript"></script>

<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$actual_link = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = strtok($actual_link, '?');
$trash_page = "{$base_url}admin/trash.php";
$client_page = "{$base_url}admin/clients.php";
$staff_page = "{$base_url}admin/staff.php";
$setting_page = "{$base_url}admin/email-setting.php";
$admin_page = "{$base_url}admin/index.php";
$staffb_page = "{$base_url}client/index.php";
$clientb_page = "{$base_url}staff/index.php";

if ($actual_link != $trash_page && $actual_link != $client_page && $actual_link != $staff_page && $actual_link != $setting_page && $actual_link != $admin_page && $actual_link != $staffb_page && $actual_link != $clientb_page) { ?>
	<script src="<?php echo $base_url; ?>assets/js/semantic.min.js" type="text/javascript"></script>
<?php } ?>
<script src="<?php echo $base_url; ?>assets/js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url; ?>assets/js/client.js" type="text/javascript"></script>
<script src="<?php echo $base_url; ?>assets/js/general.js?var=<?php echo rand(); ?>" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<!-- JQUERY BOTONES DE EXPORTAR PDF -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!-- JQUERY BOTONES DE IMPRIMIR -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/datatables.js" type="text/javascript"></script>

<!-- END CORE PLUGINS -->
</body>
<!-- END BODY -->

</html>