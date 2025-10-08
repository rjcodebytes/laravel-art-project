@extends('layouts.admin_app')

@section('title', 'Manage Blogs')

@section('content')
<div class="p-6">
	<div class="flex items-center justify-between mb-6">
		<h2 class="text-lg font-semibold text-gray-800">Blog Management</h2>
		<a {{--href="{{ route('admin.blog.create') ?? '#' }}" --}}
			class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">
			<i class="fa-solid fa-plus"></i>
			Add Blog
		</a>
	</div>

	<div class="bg-white shadow rounded-lg overflow-hidden">
		<table class="min-w-full divide-y divide-gray-200">
			<thead class="bg-gray-50">
				<tr>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Excerpt</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
					<th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
				</tr>
			</thead>
			<tbody class="bg-white divide-y divide-gray-200">
				@php
					$_blogs = $blogs ?? null;
					if (!$_blogs) {
						$_blogs = class_exists(\App\Models\Blog::class)
							? \App\Models\Blog::orderBy('created_at','desc')->get()
							: collect([
								(object)['id'=>1,'title'=>'Welcome Post','excerpt'=>'This is a sample blog excerpt.','created_at'=>now()->subDays(2)],
								(object)['id'=>2,'title'=>'Second Post','excerpt'=>'Another example blog excerpt.','created_at'=>now()->subDay()],
							]);
					}
				@endphp

				@forelse ($_blogs as $blog)
					<tr>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $blog->title ?? $blog['title'] }}</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($blog->excerpt ?? ($blog['excerpt'] ?? ''), 80) }}</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ optional($blog->created_at ?? ($blog['created_at'] ?? null))->diffForHumans() ?? '-' }}</td>
						<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
							<a {{--href="{{ route('admin.blog.edit', $blog->id ?? ($blog['id'] ?? '#')) }}" --}} class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
							<form {{--action="{{ route('admin.blog.destroy', $blog->id ?? ($blog['id'] ?? '#')) }}"--}} method="POST" class="inline">
								@csrf
								@method('DELETE')
								<button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete this blog?')">Delete</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No blogs found.</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection
