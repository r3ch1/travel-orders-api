<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\In;

class ValidationRuleInServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::replacer('in', function ($message, $attribute, $rule, $parameters) {
            if (!empty($parameters)) {
                $values = [];
                foreach ($parameters as $param) {
                    if (is_object($param)) {
                        if (method_exists($param, 'value')) {
                            $values[] = $param->value();
                        } elseif (property_exists($param, 'value')) {
                            $values[] = $param->value;
                        }
                    } else {
                        $values[] = $param;
                    }
                }

                $formattedValues = collect($values)
                    ->filter()
                    ->map(fn($value) => "'{$value}'")
                    ->join(', ');

                    return "The {$attribute} field must be one of the following values: {$formattedValues}.";
            }

            return $message;
        });
    }
}
