<?php

namespace Nemundo\App\Dataset\Setup;

use Nemundo\App\Dataset\Data\Category\Category;
use Nemundo\App\Dataset\Data\Category\CategoryId;
use Nemundo\App\Dataset\Data\Dataset\Dataset;
use Nemundo\App\Dataset\Data\Organisation\Organisation;
use Nemundo\App\Dataset\Data\Organisation\OrganisationId;
use Nemundo\App\Dataset\Type\AbstractDataset;
use Nemundo\Core\Base\AbstractBase;

class DatasetSetup extends AbstractBase
{

    public function addDataset(AbstractDataset $dataset)
    {

        $organisationId = null;
        $categoryId = null;

        if ($dataset->category !== null) {

            $data = new Category();
            $data->ignoreIfExists = true;
            $data->category = $dataset->category;
            $data->save();

            $id = new CategoryId();
            $id->filter->andEqual($id->model->category, $dataset->category);
            $categoryId = $id->getId();

        }

        if ($dataset->organisation !== null) {

            $data = new Organisation();
            $data->ignoreIfExists = true;
            $data->organisation = $dataset->organisation;
            $data->save();

            $id = new OrganisationId();
            $id->filter->andEqual($id->model->organisation, $dataset->organisation);
            $organisationId = $id->getId();

        }

        $data = new Dataset();
        $data->updateOnDuplicate = true;
        $data->phpClass = $dataset->getClassName();
        $data->dataset = $dataset->dataset;
        $data->description = $dataset->description;
        $data->url = $dataset->url;
        $data->documentationUrl = $dataset->documentationUrl;
        $data->licence = $dataset->licence;
        $data->licenceUrl = $dataset->licenceUrl;
        $data->categoryId = $categoryId;
        $data->organisationId = $organisationId;
        $data->save();

        return $this;

    }

}