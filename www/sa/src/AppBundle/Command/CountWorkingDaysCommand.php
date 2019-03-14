<?php


namespace AppBundle\Command;

use AppBundle\Service\CountWorkingDaysService;
use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 14.3.19
 * Time: 21.43
 */
class CountWorkingDaysCommand extends Command
{

    /**
     * @var CountWorkingDaysService $service
     */
    private $service;

    /**
     * CountWorkingDaysCommand constructor.
     * @param CountWorkingDaysService $service
     */
    public function __construct(CountWorkingDaysService $service)
    {
        $this->service = $service;

        parent::__construct();
    }

    public function configure()
    {
        $this
            ->setName('app:count-working-days')
            ->addArgument('start', InputArgument::REQUIRED)
            ->addArgument('end', InputArgument::REQUIRED)
            ->addArgument('weekends', InputArgument::IS_ARRAY | InputArgument::OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $weekendDates = $input->getArgument('weekends');
            if ($weekendDates != null){
                foreach ($weekendDates as $i => $date){
                    $weekendDates[$i] = new DateTime($date);
                }
            } else {
                $weekendDates = [];
            }
            $output->writeln('Working days => ' . $this->service->countDays(
                    new DateTime($input->getArgument('start')),
                    new DateTime($input->getArgument('end')),
                    $weekendDates)
            );
        } catch (\AppBundle\ServiceException $e) {
            $output->writeln('Error, sorry...');
        } catch (\Exception $e){
            $output->writeln('Bad enter');
        }
    }


}