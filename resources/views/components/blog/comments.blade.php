@props(['post'])
<div class="my-4">
    <h2 class="text-2xl font-bold text-gray-700">
        {{ __('comments.leave_reply') }}</h2>
    <p class="text-base text-gray-500">{{ __('comments.adress_not_published') }}</p>
</div>

<comment-form :post-id="{{ $post->id }}" :is-auth="{{ auth()->check() ? 'true' : 'false' }}" 
    placeholder="@lang('comments.placeholder.content')" button="@lang('comments.comment')">
</comment-form>

<h2 class="my-4 text-2xl font-bold text-gray-700">
    {{ trans_choice('comments.count', $post->comments_count, ['title' => $post->title]) }}</h2>

<comment-list :post-id="{{ $post->id }}" loading-comments="@lang('comments.loading_comments')"
    data-confirm="@lang('forms.comments.delete')" :is-auth="{{ auth()->check() ? 'true' : 'false' }}">
</comment-list> 
