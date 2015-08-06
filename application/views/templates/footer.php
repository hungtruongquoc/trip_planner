		<em>&copy; 2014</em>
		</div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
		<script src="<?php echo base_url("assets/js/global.min.js") ?>"></script>
		<?php if($ControllerName === 'trips' && $ActionName === 'create'): ?>
			<script src="<?php echo base_url("assets/js/moment-with-locales.min.js") ?>"></script>
<!--			<script src="--><?php //echo base_url("assets/js/bootstrap-datetimepicker.min.js") ?><!--"></script>-->
			<script src="<?php echo base_url("assets/js/create.min.js") ?>"></script>
		<?php endif; ?>
    </body>
</html>
