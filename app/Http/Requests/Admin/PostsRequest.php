<?php

namespace App\Http\Requests\Admin;

use App\Rules\CanBeAuthor;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->input('title'))
        ]);

        $this->merge([
            'author_id' => auth()->user()->id
        ]);

        $this->merge([
            'posted_at' => $this->has('posted_at') ? Carbon::parse($this->input('posted_at')) : null
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'posted_at' => 'nullable|date',
            'author_id' => ['required', 'exists:users,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'slug' => 'unique:posts,slug,' . (optional($this->post)->id ?: 'NULL'),
        ];
    }
}
