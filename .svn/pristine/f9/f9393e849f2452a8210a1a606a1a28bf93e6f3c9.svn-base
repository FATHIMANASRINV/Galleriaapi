{extends file="layout/base.tpl"}
{block name="header"}
<style>



</style>
{/block}
{block name="body"}

<div class="row">
	<div class="card h-100 w-100">
		<div class="messenger">
			<div class="messenger-sidebar" style="max-width:100%;">
				<div class="messenger-sidebar-header text-center mb-3">
					<h3 style="color: white; display: inline-block; padding: 5px 15px; border-radius: 5px;">Monoline Users</h3>
				</div>
				<div class="messenger-sidebar-body">
					<div class="col-ms-12 user-grid mb-3">
						<div class="table-responsive">
							<table class="table table-bordered color-table primary-table w-100" id="exportTable" style="width: 100%;">
								<thead>
									<tr>
										<th>Level</th>
										<th>Username</th>
										<th>Package</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									{$count=count($users)}
									{$counts=1}
									{foreach $users as $user}
									<tr>
										<td>{$counts}</td>
										<td>{$user.user_name}</td>
										<td>{$user.package_name}</td>
										<td>{$user.date_of_joining}</td>
										{$counts=$counts+1}
									</tr>
									{/foreach}
								</tbody>
							</table>

						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
{/block}
{block name="footer"}
<script type="module" src="{assets_url()}backend/js/demo/page-messenger.demo.js"></script>

<script type="text/javascript">
</script>
{/block}