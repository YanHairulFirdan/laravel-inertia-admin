<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Invoice
 *
 * @property int $id
 * @property int $user_id
 * @property string $to it will store person or organization who make transaction with user
 * @property int $base_price it will stores price per selected unit
 * @property float $amount
 * @property \App\Enums\UnitType $unit
 * @property \App\Enums\InvoiceType $type
 * @property int $total_price it will stores result from base_price multiply by amount
 * @property string $transaction_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice expensesThisMonth()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice expensesThisYear()
 * @method static \Database\Factories\InvoiceFactory factory(...$parameters)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice monthlyExpenses()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice monthlySales()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice monthlySalesDataChart()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice newModelQuery()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice newQuery()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice query()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice salesThisMonth()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice salesThisYear()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice totalExpense()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice totalSale()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereAmount($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereBasePrice($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereCreatedAt($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereId($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereIsExpense()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereIsSale()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereTo($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereTotalPrice($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereTransactionDate($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereTransactionThisMonth()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereTransactionThisYear()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereType($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereUnit($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereUpdatedAt($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice whereUserId($value)
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice yearlyExpenses()
 * @method static \App\QueryBuilders\InvoiceQueryBuilder|Invoice yearlySale()
 */
	class Invoice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $name
 * @property string $locale
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 */
	class Language extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property array $title
 * @property array $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Language[] $languages
 * @property-read int|null $languages_count
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

