<?php
// src/Model/Table/EventsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class EventsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('Slugs');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('title')
            ->notEmptyString('date')
            ->notEmptyString('city')
            ->notEmptyString('venue');

        return $validator;
    }

    // TODO: Look into using findOrCreate: https://book.cakephp.org/4/en/orm/saving-data.html#find-or-create-an-entity
    public function afterSave(\Cake\Event\EventInterface $event, $entity, $options)
    {
        // Does this slug already exist in the database? If so, bail out here.
        $existing_slug = $this->Slugs->find('all')->where(['slug' => $entity['slug']])->first();
        if (isset($existing_slug)) {
            return;
        };

        // If it doesn't already exist, save it.
        $new_slug = $this->Slugs->newEmptyEntity();
        $new_slug->slug = $entity['slug'];
        $new_slug->event_id = $entity['id'];
        $this->Slugs->save($new_slug);
    }
}