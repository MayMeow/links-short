<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Links Model
 *
 * @method \App\Model\Entity\Link newEmptyEntity()
 * @method \App\Model\Entity\Link newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Link> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Link get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Link findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Link patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Link> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Link|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Link saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Link>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Link>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Link>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Link> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Link>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Link>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Link>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Link> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LinksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('links');
        $this->setDisplayField('short_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('url')
            ->requirePresence('url', 'create')
            ->notEmptyString('url');

        $validator
            ->scalar('short_id')
            ->maxLength('short_id', 255);
            # ->requirePresence('short_id', 'create')
            # ->notEmptyString('short_id');

        return $validator;
    }
}
