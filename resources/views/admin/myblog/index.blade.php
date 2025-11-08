@extends('layouts.admin_app')

@section('title', 'Manage Blogs')

@section('content')
<div class="p-6">
	<div class="flex items-center justify-between mb-6">
		<h2 class="text-lg font-semibold text-gray-800">Blog Management</h2>
		<a href="{{ route('admin.myblog.create') }}"
			class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">
			<i class="fa-solid fa-plus"></i>
			Add Blog
		</a>
	</div>

	<div class="bg-white shadow rounded-lg overflow-hidden ">
		<table class="min-w-full divide-y divide-gray-200">
			<thead class="bg-gray-50">
				<tr>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
					<th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
					<th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
				</tr>
			</thead>

			<tbody class="bg-white divide-y divide-gray-200">
				@forelse ($blogs as $blog)
					<tr>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
							{{ $blog->title }}
						</td>

						{{-- FEATURED COLUMN --}}
						<td class="px-6 py-4 text-center">
							<form action="{{ route('admin.blog.toggleFeatured', $blog->id) }}" method="POST">
								@csrf
								@method('PATCH')
								<button type="submit" class="focus:outline-none">
									@if($blog->featured)
										<i class="fa-solid fa-star text-yellow-400 text-xl"></i>
									@else
										<i class="fa-regular fa-star text-gray-400 text-xl hover:text-yellow-400"></i>
									@endif
								</button>
							</form>
						</td>

						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
							{{ $blog->created_at->diffForHumans() }}
						</td>

						<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
							<a href="{{ route('admin.myblog.edit', $blog->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
								Edit
							</a>
							<form action="{{ route('admin.myblog.destroy', $blog->id) }}" method="POST" class="inline">
								@csrf
								@method('DELETE')
								<button type="submit" class="text-red-600 hover:text-red-900"
									onclick="return confirm('Delete this blog?')">
									Delete
								</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No blogs found.</td>
					</tr>
				@endforelse
			</tbody>
		</table>

		{{-- Pagination --}}
		<div class="p-4">
			{{ $blogs->links() }}
		</div>
	</div>
</div>
@endsection
