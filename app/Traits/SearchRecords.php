<?php

namespace App\Traits;

// use App\Http\Search\SearchRecordsMain;

trait SearchRecords
{
  private static $query = null;
  private static $paginate = false;
  public static function searchRecords($filters , $getQuery = 0 , $publicFilterName= null)
  {
      $model = new static();
      $query = $model->newQuery();
      self::$paginate = $filters['paginate'] ?? false;

    //   if(isset($filters['public-filter'])){
    //       (new SearchRecordsMain())->handle($model->getTable() , $model->searchFields , $filters['public-filter'] , $query , $publicFilterName);
    //   }

      foreach ($filters as $key => $value) {
          $type = self::replaceAdditionalWord($key);
          if (in_array($key, $model->searchFields ?? [])) {
              if ($type == "min") {
                  $query->where($key, ">=", $value);
              } elseif ($type == "max") {
                  $query->where($key, "<=", $value);
              } elseif ($type == "equal") {
                  $query->where($key, $value);
              } elseif ($type == "parent") {
                  $query->when($value, function ($query) use ($value) {
                      $query->whereNull("parent_id");
                  });
              } else {
                  $query->where($key, "like", "%$value%");
              }
          }
      }

      if(!isset($filters['order_field'])){
          $query->orderBy("id", "DESC");
      }elseif(in_array($filters['order_field'] ?? "id", $model->searchFields ?? ["id"]) && in_array($filters['order_type'] ?? "DESC", ["ASC" , "DESC"])) {
          $query->orderBy($filters['order_field'] ?? "id", $filters['order_type'] ?? "DESC");
      }

      if($getQuery)
          return $query;

      self::$query = $query;
      return $model;
  }

  public static function addedQuery(\Closure $closure = null)
  {
      $query = $closure == null ? self::$query : $closure(self::$query);
      if(self::$paginate)
        return $query->paginate(10);
      return ["data" => $query->get()];
  }

  private static function replaceAdditionalWord(&$key): string
  {
      $type = "like";
      if(str_contains($key , 'min-')){
          $key = str_replace("min-" , "" , $key);
          $type = "min";
      }elseif (str_contains($key , 'max-')){
          $key = str_replace("max-" , "" , $key);
          $type = "max";
      }elseif (str_contains($key , 'eq-')){
          $key = str_replace("eq-" , "" , $key);
          $type = "equal";
      }elseif($key == 'is_parent'){
          $key = str_replace("is_parent" , "parent_id" , $key);
          $type = "parent";
      }
      return $type;
  }

}
