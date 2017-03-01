<?php

namespace Asana\Resources\Gen;

/**
 * A _section_ is a subdivision of a project that groups tasks together. It can
 * either be a header above a list of tasks in a list view or a column in a
 * board view of a project.
*/
class SectionsBase
{
    /**
     * @param Asana/Client client  The client instance
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new section in a project.
     * 
     * Returns the full record of the newly created section.
     *
     * @param  project The project to create the section in
     * @return response
     */
    public function createInProject($project, $params = array(), $options = array())
    {
        $path = sprintf("/projects/%s/sections", $project);
        return $this->client->post($path, $params, $options);
    }

    /**
     * Returns the compact records for all sections in the specified project.
     *
     * @param  project The project to get sections from.
     * @return response
     */
    public function findByProject($project, $params = array(), $options = array())
    {
        $path = sprintf("/projects/%s/sections", $project);
        return $this->client->get($path, $params, $options);
    }

    /**
     * Returns the complete record for a single section.
     *
     * @param  section The section to get.
     * @return response
     */
    public function findById($section, $params = array(), $options = array())
    {
        $path = sprintf("/sections/%s", $section);
        return $this->client->get($path, $params, $options);
    }

    /**
     * A specific, existing section can be updated by making a PUT request on
     * the URL for that project. Only the fields provided in the `data` block
     * will be updated; any unspecified fields will remain unchanged. (note that
     * at this time, the only field that can be updated is the `name` field.)
     * 
     * When using this method, it is best to specify only those fields you wish
     * to change, or else you may overwrite changes made by another user since
     * you last retrieved the task.
     * 
     * Returns the complete updated section record.
     *
     * @param  section The section to update.
     * @return response
     */
    public function update($section, $params = array(), $options = array())
    {
        $path = sprintf("/sections/%s", $section);
        return $this->client->put($path, $params, $options);
    }

    /**
     * A specific, existing section can be deleted by making a DELETE request
     * on the URL for that section.
     * 
     * Note that sections must be empty to be deleted.
     * 
     * The last remaining section in a board view cannot be deleted.
     * 
     * Returns an empty data block.
     *
     * @param  section The section to delete.
     * @return response
     */
    public function delete($section, $params = array(), $options = array())
    {
        $path = sprintf("/sections/%s", $section);
        return $this->client->delete($path, $params, $options);
    }

    /**
     * Move sections relative to each other in a board view. One of
     * before_section or after_section is required (or else the request will
     * behave as a no-op).
     * 
     * At this point in time, moving sections is not supported in list views.
     * 
     * Returns an empty data block.
     *
     * @param  project The project in which to reorder this section
     * @return response
     */
    public function insertInProject($project, $params = array(), $options = array())
    {
        $path = sprintf("/projects/%s/sections/insert", $project);
        return $this->client->post($path, $params, $options);
    }
}