<?php
namespace App\Serivces\OurTeam;

use App\Models\OurTeam;
use App\Models\Section;
use App\Models\Service;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OurTeamService implements OurTeamInterface
{
    use Image;
    public function createOrUpdateTeam($data)
    {
        DB::beginTransaction();
        try 
        {
            if(array_key_exists('image',$data)){
                $image = $data['image'];
            }

            if( array_key_exists('our_team_id',$data) && $data['our_team_id'] != 0 && !is_null( $data['our_team_id'] ))
            {
                $our_team = OurTeam::find( $data['our_team_id'] );
                if(array_key_exists('image',$data)){
                    $image = $data['image'] ?? $our_team->image;
                }
                if( $our_team &&  $our_team->image !=  $image->getClientOriginalName())
                    $this->deleteImage( $our_team->image,OurTeam::PATH );
            }
            else 
                $our_team = new OurTeam();
            $our_team->name            = array_key_exists('name',$data) ? $data['name'] : null;
            $our_team->designation      = array_key_exists('designation',$data) ? $data['designation'] : null;
            $our_team->our_team_roles_id= array_key_exists('category',$data) ? $data['category'] : null;
            $our_team->image            = ($our_team->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, OurTeam::PATH) : $our_team->image;
            $our_team->save();
            DB::commit();
            return true;
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::info("Our Team => ".$ex->getMessage());
            return $ex->getMessage();
        }        
    }

    public function deleteTeam( $id )
    {
        try 
        {
            $our_team = OurTeam::find($id);
            $this->deleteImage( $our_team->image,OurTeam::PATH );
            $our_team->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Our Team". $ex->getMessage() );
            return $ex->getMessage();
        }
    }
}
