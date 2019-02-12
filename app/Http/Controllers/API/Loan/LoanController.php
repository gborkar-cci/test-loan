<?php

namespace App\Http\Controllers\API\Loan;

use App\Http\Repositories\Loan\LoanRepository;
use App\Http\Repositories\User\UserRepository;
use App\Http\Requests\Loan\LoanRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\Loan\LoanResource;
use App\Http\Resources\API\User\UserResource;

class LoanController extends Controller
{
    /**
     * @var LoanRepository
     */
    private $loanRepository;

        /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * LoanController constructor.
     * @param LoanRepository $loanRepository
     * @param UserRepository $userRepository
     */
    public function __construct(LoanRepository $loanRepository, UserRepository $userRepository)
    {
        $this->loanRepository = $loanRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param LoanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(LoanRequest $request)
    {
        $loanInfo = $this->loanRepository->createLoan($request->only(['loan_amount', 'duration', 'repayment_frequency', 'interest_rate', 'arrangement_fees', 'loan_type_id']));
        $loanInfo->status = 201;
        $loanInfo->message = 'Successfully Loan Created';
        return (new LoanResource($loanInfo))->response()->setStatusCode(201);
    }

    public function getLoansForUser()
    {
        $loans = $this->userRepository->getLoanForUser();

        return new UserResource($loans);
    }
}
