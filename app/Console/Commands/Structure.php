<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class Structure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:structure {model} {module?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command generate model and a base repository out of the box.';

    /**
     * Filesystem instance
     *
     * @var string
     */
    protected $filesystem;

    /**
     * Default laracom folder
     *
     * @var string
     */
    protected $folder;

    protected $modelPath = 'App/Models';

    protected $policyPath = 'App/Policies';

    protected $controllerPath = 'App/Http/Controllers/Dashboard';

    protected $requestPath = 'App/Http/Requests';

    protected $filterPath = 'App/Http/Filters';

    protected $scopePath = 'App/Models/Scopes';

    protected $relationPath = 'App/Models/Relationship';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */


    public function handle()
    {
        $this->model = ucfirst($this->argument('model'));
        $this->module = $this->argument('module');

        $pluralModel = Str::plural($this->model);
        $pluralSmallModel = strtolower($pluralModel);


        if ($this->filesystem->exists("{$this->modelPath}/{$this->model}.php")) {
            return $this->error("The given model already exists!");
        }

        $this->createFolders($this->modelPath);

        $this->createFile(
            app_path('Console/Stubs/DummyModel.stub'),
            "{$this->modelPath}/{$this->model}.php"
        );


        $this->createFile(
            app_path('Console/Stubs/DummyController.stub'),
            "{$this->controllerPath}/{$this->model}Controller.php"
        );

        $this->createFile(
            app_path('Console/Stubs/DummyFilter.stub'),
            "{$this->filterPath}/{$this->model}Filter.php"
        );


        $this->createFile(
            app_path('Console/Stubs/DummyPolicy.stub'),
            "{$this->policyPath}/{$this->model}Policy.php"
        );


        $this->createFile(
            app_path('Console/Stubs/DummyRequest.stub'),
            "{$this->requestPath}/{$this->model}Request.php"

        );

        $this->createFile(
            app_path('Console/Stubs/DummyRelations.stub'),
            "{$this->relationPath}/{$this->model}Relations.php"

        );

        $this->createFile(
            app_path('Console/Stubs/DummyScopes.stub'),
            "{$this->scopePath}/{$this->model}Scopes.php"

        );

        $this->createFile(
            app_path('Console/Stubs/DummyBreadCrumbs.stub'),
            "routes/breadcrumbs/{$pluralSmallModel}.php"
        );

        $this->createFile(
            app_path('Console/Stubs/DummyLangAR.stub'),
            "resources/lang/ar/{$pluralSmallModel}.php"
        );

        $this->createFile(
            app_path('Console/Stubs/DummyLangEN.stub'),
            "resources/lang/en/{$pluralSmallModel}.php"
        );


        $this->createFile(
            app_path('Console/Stubs/DummyIndex.stub'),
            "resources/views/dashboard/{$pluralSmallModel}/index.blade.php"
        );

        $this->createFile(
            app_path('Console/Stubs/DummyCreate.stub'),
            "resources/views/dashboard/{$pluralSmallModel}/create.blade.php"
        );

        $this->createFile(
            app_path('Console/Stubs/DummyEdit.stub'),
            "resources/views/dashboard/{$pluralSmallModel}/edit.blade.php"
        );

        $this->createFile(
            app_path('Console/Stubs/DummyShow.stub'),
            "resources/views/dashboard/{$pluralSmallModel}/show.blade.php"
        );

        $this->createFile(
            app_path('Console/Stubs/DummyPartialEdit.stub'),
            "resources/views/dashboard/{$pluralSmallModel}/partials/edit.blade.php"
        );

        $this->createFile(
            app_path('Console/Stubs/DummyPartialShow.stub'),
            "resources/views/dashboard/{$pluralSmallModel}/partials/show.blade.php"
        );

        $this->createFile(
            app_path('Console/Stubs/DummyPartialDelete.stub'),
            "resources/views/dashboard/{$pluralSmallModel}/partials/delete.blade.php"
        );

        $line =  "\n" ."Route::resource('{$pluralSmallModel}', '{$this->model}Controller');" . "\n";
        $file="routes/dashboard.php";
        file_put_contents($file, $line, FILE_APPEND | LOCK_EX);

        $line1 = "\n" . "@can('viewAny',\App\Models" . "\\" . "$this->model::class)" ."\n" ."    "
              . "<li class='nav-item'>" . "\n" ."        "
              . "<a class='nav-link" . "\n" ."                    "
              . "{{Route::is('dashboard/{$pluralSmallModel}') ? 'active' : '' }}" ."'" . "\n" ."                    "
              . "href='{{route('dashboard.{$pluralSmallModel}.index')}}'>" . "\n" ."            "
              . "<i class='nav-icon fas fa-tachometer-alt'></i>" . "\n" ."           "
              . "@lang('{$pluralSmallModel}.actions.list')" . "\n" ."        "
              . "</a>" . "\n" ."    "
              . "</li>" . "\n"
              . "@endcan";
        $file1="resources/views/includes/partials/sidebar-tabs.blade.php";
        file_put_contents($file1, $line1, FILE_APPEND | LOCK_EX);

        $this->info('File structure for ' . $this->model . ' created.');

    }

    protected function createFile($dummySource, $destinationPath, $type = null)
    {
        $pluralModel = Str::plural($this->model);
        $modelNameSpace = $this->modelPath . '\\' . $pluralModel;
        $dummyRepository = $this->filesystem->get($dummySource);
        $repositoryContent = str_replace(
            [
                'Dummy',
                'Dummies',
                'type_request',
                'models',
                'model_name',
                'controllers',
                'plural_lower_case',
                'single_lower_case',
            ],

            [
                $this->model,
                $pluralModel,
                $type,
                str_replace("/", '\\', $modelNameSpace),
                $this->model,
                str_replace("/", '\\', $this->controllerPath),
                Str::plural(strtolower($this->model)),
                strtolower($this->model)
            ],
            $dummyRepository
        );
        $this->filesystem->put($dummySource, $repositoryContent);
        $this->filesystem->copy($dummySource, $destinationPath);
        $this->filesystem->put($dummySource, $dummyRepository);
    }

    protected function createFolders($baseFolder)
    {
        $pluralModel = Str::plural($this->model);
        $pluralSmallModel = strtolower($pluralModel);

        $this->makeDirectory("resources/views/dashboard" . "/{$pluralSmallModel}/partials/.");


    }

    protected function makeDirectory($path)
    {
        if (!$this->filesystem->isDirectory(dirname($path))) {
            $this->filesystem->makeDirectory(dirname($path), 0777, true, true);
        }
        return $path;
    }



}
