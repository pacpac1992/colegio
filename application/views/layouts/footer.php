	</div>
	<div class="col-md-3">

		<!-- accordion -->
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Opciones
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <ul class="list-group">
			<?php foreach ($menu as $key => $value): ?>
			<li class="list-group-item">
				<span class="badge"><?= $value; ?></span>
				<a href="<?= base_url(strtolower($key)); ?>"><?= $key; ?></a>
			</li>
			<?php endforeach ?>
		</ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Avisos
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <ul class="list-group">
			<?php foreach ($menu as $key => $value): ?>
			<li class="list-group-item">
				<span class="badge"><?= $value; ?></span>
				<a href="<?= base_url(strtolower($key)); ?>"><?= $key; ?></a>
			</li>
			<?php endforeach ?>
		</ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Herramientas
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
         <ul class="list-group">
			<?php foreach ($menu as $key => $value): ?>
			<li class="list-group-item">
				<span class="badge"><?= $value; ?></span>
				<a href="<?= base_url(strtolower($key)); ?>"><?= $key; ?></a>
			</li>
			<?php endforeach ?>
		</ul>
      </div>
    </div>
  </div>
</div>
		<!-- end accordion -->
	</div>
</div>
</article>
</body>
</html>