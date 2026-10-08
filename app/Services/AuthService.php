<?php
declare(strict_types=1);
namespace App\Services;
use App\Core\Auth;
use App\Repositories\UserRepository;
final class AuthService {public function __construct(private UserRepository $users=new UserRepository()){} public function attempt(string $email,string $password):bool{$u=$this->users->findByEmail(strtolower(trim($email)));if(!$u||$u['status']!=='active'||!password_verify($password,$u['password_hash']))return false;Auth::login((int)$u['id']); $_SESSION['user_name']=$u['name']; return true;}}
