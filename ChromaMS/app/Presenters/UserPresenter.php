<?php 
namespace ChromaMS\Presenters;

use Lewis\Presenter\AbstractPresenter;

use League\CommonMark\CommonMarkConverter;

use Carbon\Carbon;



class UserPresenter extends AbstractPresenter
{

	public function lastLoginDifference()
	{
		// return $this->last_login_at->diffForHumans();
		$date = $this->last_login_at;
		return $date->diffInMonths(Carbon::now()) >= 1 ? $date->format('Y-m-d H:i:s') : $date->diffForHumans();
	}


}