<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $logo
 * @property string $name
 * @property string $slug
 * @property int $is_featured
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperBrand {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $icon
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubCategory> $subCategories
 * @property-read int|null $sub_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCategory {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $category_id
 * @property int $sub_category_id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\SubCategory|null $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperChildCategory {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $quantity
 * @property int $max_use
 * @property string $start_date
 * @property string $end_date
 * @property string $discount_type
 * @property float $discount
 * @property int $status
 * @property int $total_used
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereMaxUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereTotalUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCoupon {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSale whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFlashSale {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property int $flash_sale_id
 * @property int $show_at_home
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem whereFlashSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem whereShowAtHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashSaleItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFlashSaleItem {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $site_name
 * @property string $layout
 * @property string $contact_email
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $map_url
 * @property string $currency_name
 * @property string $currency_icon
 * @property string $timezone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereContactAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCurrencyIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereMapUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperGeneralSetting {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $thumb_image
 * @property int $vendor_id
 * @property int $category_id
 * @property int|null $sub_category_id
 * @property int|null $child_category_id
 * @property int $brand_id
 * @property int $qty
 * @property string $short_description
 * @property string $long_description
 * @property string|null $video_link
 * @property string|null $sku
 * @property float $price
 * @property float|null $offer_price
 * @property string|null $offer_start_date
 * @property string|null $offer_end_date
 * @property string|null $product_type
 * @property int $status
 * @property int $is_approved
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductImageGallery> $productImageGalleries
 * @property-read int|null $product_image_galleries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVariant> $variants
 * @property-read int|null $variants_count
 * @property-read \App\Models\Vendor|null $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereChildCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLongDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOfferEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOfferPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOfferStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereThumbImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVideoLink($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProduct {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImageGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImageGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImageGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImageGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImageGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImageGallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImageGallery whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImageGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProductImageGallery {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVariantItem> $productVariantItems
 * @property-read int|null $product_variant_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariant query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariant whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariant whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProductVariant {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_variant_id
 * @property string $name
 * @property float $price
 * @property int $is_default
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductVariant|null $productVariant
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProductVariantItem {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property float|null $min_cost
 * @property float $cost
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule whereMinCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingRule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperShippingRule {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $banner
 * @property string|null $type
 * @property string|null $title
 * @property string|null $starting_price
 * @property string|null $btn_url
 * @property int|null $serial
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereBtnUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereStartingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSlider {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChildCategory> $childCategories
 * @property-read int|null $child_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSubCategory {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $username
 * @property string|null $image
 * @property string|null $phone
 * @property string $email
 * @property string $role
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\Vendor|null $vendor
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $zip
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereZip($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUserAddress {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $banner
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $description
 * @property string|null $fb_link
 * @property string|null $tw_link
 * @property string|null $ig_link
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $shop_name
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereFbLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereIgLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereTwLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperVendor {}
}

