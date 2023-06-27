<?php

namespace App\Http\Livewire\Agent;

use Livewire\Component;
use App\Models\Language;
use Livewire\WithPagination;

class LanguageManager extends Component
{
    use WithPagination;

    public $search;
    public $language;
    public $showLanguageForm;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected function rules()
    {
        return [
            'language.name' => 'required|string|unique:languages,name,' . $this->language->id,
            'language.code' => 'required|string|unique:languages,code,' . $this->language->id,
            'language.active' => 'nullable|boolean',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function createLanguage()
    {
        $this->language = new Language();
        $this->showLanguageForm = true;
    }

    public function saveLanguage()
    {
        $this->validate([
            'language.name' => 'required|string|unique:languages,name,' . $this->language->id,
            'language.code' => 'required|string|unique:languages,code,' . $this->language->id,
            'language.active' => 'nullable|boolean',
        ]);
        $this->language->save();
        $this->dispatchBrowserEvent('notify', $this->language->wasRecentlyCreated ? trans('Language has been created.') : trans('Language has been updated.'));
        $this->reset('language', 'showLanguageForm');
    }

    public function editLanguage(Language $language)
    {
        $this->language = $language;
        $this->showLanguageForm = true;
    }

    public function deleteLanguage(Language $language)
    {
        $language->delete();
        $this->reset('language', 'showLanguageForm');
        $this->notify(trans('Language has been removed.'));
    }

    public function toggleActive(Language $language)
    {
        $language->active = ! $language->active;
        $language->save();
    }

    public function getLanguagesProperty()
    {
        return Language::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            /* ->withCount('tickets') */
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.agent.language-manager');
    }
}
