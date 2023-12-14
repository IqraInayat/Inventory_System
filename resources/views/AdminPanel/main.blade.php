<!DOCTYPE html>
<html lang="en">

@include('AdminPanel.includes.header')

<body>
	<div class="wrapper">

		@include('AdminPanel.includes.sidebar')

		<div class="main">

			@include('AdminPanel.includes.navbar')

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h1 mb-3">
                        @yield('myheading')
                    </h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">

                                    @yield('mycontent')

								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			@include('AdminPanel.includes.footer')
		</div>
	</div>

	<script src="{{ asset('admin/js/app.js')}}"></script>
{{-- yield directive is used to display the content of section --}}
{{-- @stack('scripts') --}}
</body>

</html>