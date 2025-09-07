<?php

namespace App\Modules\User\Repositories;

use App\Models\User;
use App\Models\Profile;
use App\Modules\User\Data\UserData;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function query()
    {
        return $this->makeModel()
            ->newQuery();
    }

    public function create(UserData $data): User
    {
        $params = [...$data->toArrayModel(), ...['profile_id' => Profile::where('name', 'CLIENT')->firstOrFail()->id]];
        return $this->makeModel()->create($params);
    }
}

