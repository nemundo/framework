<?php

namespace Nemundo\App\Script\Setup;


use Nemundo\App\Application\Setup\AbstractSetup;
use Nemundo\App\Script\Data\Script\Script;
use Nemundo\App\Script\Data\Script\ScriptDelete;
use Nemundo\App\Script\Data\Script\ScriptUpdate;
use Nemundo\App\Script\Type\AbstractScript;


class ScriptSetup extends AbstractSetup
{

    public function addScript(AbstractScript $script)
    {

        $data = new Script();
        $data->updateOnDuplicate = true;
        $data->setupStatus = true;
        $data->scriptName = $script->scriptName;
        $data->description = $script->scriptDescription;
        $data->scriptClass = $script->getClassName();
        $data->consoleScript = $script->consoleScript;
        if ($this->application !== null) {
            $data->applicationId = $this->application->applicationId;
        }
        $data->save();

        return $this;

    }


    public function removeScript(AbstractScript $script)
    {

        $delete = new ScriptDelete();
        $delete->filter->andEqual($delete->model->scriptClass, $script->getClassName());
        $delete->delete();

        return $this;

    }


    public function resetSetupStatus()
    {

        $update = new ScriptUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function removeUnusedScript()
    {

        $delete = new ScriptDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }

}